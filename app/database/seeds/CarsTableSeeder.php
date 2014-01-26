<?php

class CarsTableSeeder extends Seeder {

	public function run()
	{
		// Uncomment the below to wipe the table clean before populating
		DB::table('cars')->truncate();
		$csv = explode(PHP_EOL, file_get_contents(app_path().'/database/seeds/row.csv'));
		$cars = array();
		foreach ($csv as $line) {
			$array = explode(';', $line);
			if(!isset($array[1]))continue;
			$time = preg_replace('/[^0-9.]/', '', 
							strtr(
								$array[1], 
								[','=>'.', '/'=>'.']
								)
							);
			$time = mb_strlen($time) <= 6?$time.=(substr_count($time, '.')==1?'.2013':'2013'):$time;
			$time = mb_strlen($time) == 11?substr($time, 1):$time;
			$cars[] = array(
				'ship' => $array[1],
				'date' =>  with(new DateTime($time))->format('Y-m-d'),
				'model' => strpos($array[4], ' ')?substr($array[4], 0, strpos($array[4], ' ')):'',
				'mark' => strpos($array[4], ' ')?substr($array[4], strpos($array[4], ' ')+1):'',
				'body' => $array[5],
				'year' => $array[6],
				'comment' => $array[7],
				'status' => $array[8],
				'customer_id' => 1,
			);
		}
		// Uncomment the below to run the seeder
		DB::table('cars')->insert($cars);
	}

}
