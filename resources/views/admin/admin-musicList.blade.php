<x-app-layout>
    <x-slot name="header">

        <p>Reported Tracks</p>
        <hr style="border-color: white;">
        <ul id="reportedTracksList" style="white-space: nowrap; overflow-x: auto;"></ul>

        <p>All Tracks</p>
        <hr style="border-color: white;">
        <ul id="allTracksList" style="white-space: nowrap; overflow-x: auto;"></ul>
       

        @include('modals.viewReport')

        <script type="text/javascript">
            function displayReportedTracks() {
                fetch('/get-reported-tracks')
                    .then(response => response.json())
                    .then(data => {
                        console.log(JSON.stringify(data.tracks, null,2));
                        const reportedTracksList = document.getElementById('reportedTracksList');
                        const tracks = data.tracks || {};

                        if (Object.keys(tracks).length > 0) {
                            reportedTracksList.innerHTML =
                                `<ul>
                                    ${Object.values(tracks).map(song => 
                                        `<a href="#" onclick="showReportModal('${song.id}'); return false;">
                                            <li style="display: inline-block; margin-right: 10px;"> 
                                                <img src="/${song.cover}" alt="Default Profile Image" style="width: 150px; height: 150px; border-radius: 5px 5px 0 0; object-fit: cover;">
                                                ${song.title} 
                                            </li>
                                        </a>`).join('')}
                                </ul>`;
                        } else {
                            reportedTracksList.innerHTML = '<ul>There are no reported tracks</ul>';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching reported tracks:', error);
                    });
            }
            displayReportedTracks();
        </script>
    </x-slot>

</x-app-layout>