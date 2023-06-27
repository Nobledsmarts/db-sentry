<?php

namespace Nobledsmarts\DBSentry;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DBSentry {
    public function getBackUp() {
        $v = "@@version";
        $serverVersion = DB::select("select $v")[0]->$v;
        $phpVersion = phpversion();
        $database = env('DB_DATABASE');
        $carbon = Carbon::now();
        $date = $carbon->format('M d, Y \a\t g:i A');
        $mysqlDump = <<<END
        -- Generation Time: $date
        -- Server version: $serverVersion
        -- PHP Version: $phpVersion
        -- Note: Disable foreign key checks before importing to database
        \n\n
        END;
        $mysqlDump .=<<<END
        --
        -- Database: `$database`
        --
        \n
        -- --------------------------------------------------------
        \n
        END;

        $collection = DB::select('show tables');
        $getColumns = fn($collection, $prop) => array_reduce($collection, fn($inital, $tablename) => [...$inital, $tablename->$prop], []);
        $tablenames = $getColumns($collection, 'Tables_in_' . env('DB_DATABASE'));
        
        for($i = 0; $i < count($tablenames); $i++){
            $tablename = $tablenames[$i];
            $tableColumnsQuery = DB::select(('describe ' . $tablename));
            $tableColumns = $getColumns($tableColumnsQuery, 'Field');
            $tableColumnsStr = trim(array_reduce($tableColumns, fn($initial, $item) => "$initial `$item`, ", ""), ", ");

            $mysqlDump.=<<<END
            --
            -- Table structure for table `$tablename`
            --\n\n
            END;    

            $table = DB::select('show create table ' . $tablename);
            $createStatement = "Create Table";
            $mysqlDump .= $table[0]->$createStatement . ";\n\n";
            $recordCount = DB::scalar('select count(*) from ' . $tablename);
            $records = DB::select('select * from ' . $tablename);
            $mysqlDump.= !$recordCount ? 
            "-- --------------------------------------------------------\n\n" :
            "";

            if(!$recordCount){
               continue;
            } 

            $mysqlDump.=<<<END
            --
            -- Dumping data for table `$tablename`
            --\n\n
            END;

            $mysqlDump.="INSERT INTO `$tablename` ($tableColumnsStr) VALUES\n";

            
            for($j = 0; $j < $recordCount; $j++){
                $values = array_map(fn($item) => json_encode($item), array_values((array) $records[$j]));
                $valuesStr = trim(implode(", ", $values), " ");
                $mysqlDump .= "($valuesStr)" . ($j ==  $recordCount - 1 ? ";\n\n" : ',' . "\n");
            };
            $mysqlDump.= <<<END
            -- --------------------------------------------------------
            \n
            END;
        }
        return $mysqlDump;
    }
}
