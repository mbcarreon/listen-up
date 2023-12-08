<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class MusicBrainzController extends Controller
{
    // Music Brainz API caller
    private function fetchData($endpoint, $options)
    {
        $baseUrl = 'https://musicbrainz.org/ws/2/';
        $client = new Client();
        $response = $client->get($baseUrl . $endpoint, $options);
        $data = json_decode($response->getBody(), true);
        return $data;
    }

    // Search for artists with a string query
    public function searchArtist($query)
    {
        try {
            $endpoint = 'artist';
            $options = [
                'query' => [
                    'query' => $query,
                    'fmt' => 'json',
                    'limit' => 10,
                ]];
            $data = $this->fetchData($endpoint, $options);

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
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Search for songs with a string query
    public function searchSong($query)
    {
        try {
            $endpoint = 'recording';
            $options = [
                'query' => [
                    'query' => 'recording:' . $query,
                    'fmt' => 'json',
                    'limit' => 10,
                ]];
            $data = $this->fetchData($endpoint, $options);

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
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }

    // Retrieve song data with ID
    public function getSong($id, $inc)
    {
        try {
            $endpoint = 'recording/' . $id;
            $options = [
                'query' => [
                    'inc' => $inc,
                    'fmt' => 'json',
                ]];
            $song = $this->fetchData($endpoint, $options);

            if (!empty($song)) {
                return $song;
                
                // pakieddit na lang po san siya i reredirect
                // return view('dashboard', ['song' => $song]);
            } else {
                return ['error' => 'Song not found'];

                // pakieddit na lang po san siya i reredirect
                // return view('dashboard', ['error' => 'Song not found']);
            }
        } catch (\Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}