<?php

use Flynsarmy\CsvSeeder\CsvSeeder;

class TwitchSeeder extends CsvSeeder
{
    public function __construct()
	{
		$this->table = 'streams';
		$this->filename = base_path().'/database/seeds/twitch_data.csv';
	}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recommended when importing larger CSVs
		DB::disableQueryLog();

		// Uncomment the below to wipe the table clean before populating
		DB::table($this->table)->truncate();

		parent::run();
    }
}
