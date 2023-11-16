<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MusicBrainzController extends Controller
{
    public function searchArtist($query)
    {
        $baseUrl = 'https://musicbrainz.org/ws/2/';
        $client = new Client();
        $response = $client->get($baseUrl . 'artist', [
            'query' => [
                'query' => $query,
                'fmt' => 'json',
                'limit' => 10,
            ],
        ]);
        $data = json_decode($response->getBody(), true);

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
        $baseUrl = 'https://musicbrainz.org/ws/2/';
        $client = new Client();
        $response = $client->get($baseUrl . 'recording', [
            'query' => [
                'query' => 'recording:' . $query,
                'fmt' => 'json',
                'limit' => 10,
            ],
        ]);
        $data = json_decode($response->getBody(), true);

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