<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MusicBrainzController extends Controller
{
    private function fetchData($endpoint, $query)
    {
        $baseUrl = 'https://musicbrainz.org/ws/2/';
        $client = new Client();
        $response = $client->get($baseUrl . $endpoint, [
            'query' => [
                'query' => $query,
                'fmt' => 'json',
                'limit' => 10,
            ],
        ]);

        $data = json_decode($response->getBody(), true);

        return $data;
    }

    public function searchArtist($query)
    {
        $data = $this->fetchData('artist', $query);

        if (!empty($data['artists'])) {
            $artists = $data['artists'];
            return $artists;

            // pakieddit na lang po san siya i reredirect
            // return view('dashboard', ['artist' => $artist]);
        } else {
            return ['error' => 'Artist not found'];

            // pakieddit na lang po san siya i reredirect
            // return view('dashboard', ['error' => 'Artist not found']);
        }
    }

    public function searchSong($query)
    {
        $data = $this->fetchData('recording', 'recording:' . $query);

        if (!empty($data['recordings'])) {
            $songs = $data['recordings'];
            return $songs;
            
            // pakieddit na lang po san siya i reredirect
            // return view('dashboard', ['songs' => $songs]);
        } else {
            return ['error' => 'Song not found'];

            // pakieddit na lang po san siya i reredirect
            // return view('dashboard', ['error' => 'Song not found']);
        }
    }
}