<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class CSVReader {

    var $fields;            /** columns names retrieved after parsing */ 
    var $separator = ';';    /** separator used to explode each line */
    var $enclosure = '"';    /** enclosure used to decorate each field */

    var $max_row_size = 4096;    /** maximum row size to be used for decoding */

    function parse_file($p_Filepath) {

        $file = fopen($p_Filepath, 'r');
        $this->fields = fgetcsv($file, $this->max_row_size, $this->separator, $this->enclosure);
        $keys_values = explode(',',$this->fields[0]);

        $content    =   array();
        $keys   =   $this->escape_string($keys_values);

        $i  =   1;
        while( ($row = fgetcsv($file)) != false ) {            
            if( $row != null ) {
             // skip empty lines
                
                $data[] = array(
                              'id' => $row[0],
                              'registration_no' =>$row[1],
                              'name' => $row[2],
                              'father_name' =>$row[3],
                              'result' => $row[4],
                              );
            }
        }
        fclose($file);
       
        return $data;
    }

    function escape_string($data){
        $result =   array();
        foreach($data as $row){
            $result[]   =   str_replace('"', '',$row);
        }
        return $result;
    }   
}
?> 
