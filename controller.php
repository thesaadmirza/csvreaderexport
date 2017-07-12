public function store_result()
{
$image_path =  $data['raw_name'] . $data['file_ext'];


				$post['file_name'] = $image_path;

				$file_path =  './uploads/faculties/covers/'.$image_path;
				$this->load->library('Csvreader');

	           $result =   $this->csvreader->parse_file($file_path);//path to csv file

	             $wala=  $result;
}
