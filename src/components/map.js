import React from 'react';
import {APIProvider, Map, Marker} from '@vis.gl/react-google-maps';

export default function map({markers, center}){
    function sanitiseMarkers(markers) {
        return Object.fromEntries(
            Object.entries(markers)
            .filter(([_, lat]) => lat)
        )
    }
    return (
        <APIProvider apiKey={'MAPS_API_KEY'}>
            <Map defaultZoom={5} defaultCenter={center}>
                {Object.keys(markers).map(key => (
                    <Marker key={key} position={{lat: markers[key].lat, lng: markers[key].lng}} />
                ))}
            </Map>
        </APIProvider>
    )
};
