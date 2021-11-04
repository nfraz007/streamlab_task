<?php

use App\Models\StreamModel;
use romanzipp\Twitch\Twitch;
use Illuminate\Database\Seeder;

class TwitchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $twitch = new Twitch;
        $per_page = 100; $total_page = 10;
        
        $nextCursor = null;
        for($i = 0; $i < $total_page; $i++) {
            $result = $twitch->getStreams(['first' => $per_page], $nextCursor);
            foreach($result->data() as $item) {
                $stream = new StreamModel();
                $stream->ref_id = $item->id;
                $stream->type = $item->type;
                $stream->user_id = $item->user_id;
                $stream->game_id = $item->game_id ?: 0;
                $stream->game_name = $item->game_name ?: 'NA';
                $stream->viewer_count = $item->viewer_count;
                $stream->save();
            }
            if (isset($result)) {
                $nextCursor = $result->next();
            }
        }
    }
}
