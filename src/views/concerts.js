import React, { useEffect, useState } from "react";
import axios from "../modules/axios"
import ConcertList from "../components/concertlist";
export default function Concerts({ bands, venues, cities, countries }) {
  const [concerts, setConcerts] = useState({loading: true, concerts: []});
  const [archives, setArchives] = useState({loading: true, archives: []});
  const [stats, setStats] = useState({totalGigs: 0, totalBands: 0, totalCities: 0, totalCountries: 0});
  const [year, setYear] = useState(new Date().getFullYear());

  useEffect(() => {
    fetchConcerts();
    fetchArchives();
  }, []);

  function yearList(list) {
    var grouped = Object.groupBy(list, ({ year }) => year)
    return grouped;
  }

  function changeYear(selected){
    setYear(selected.key);
    fetchConcerts(selected.key);

  }

  function fetchArchives() {
    const fetchData = async () => {
      try {
        const { data: response } = await axios.get('/concert-archives');
        setArchives({loading: false, archives: response});
      } catch (error) {
        console.error(error.message);
      }
    }
    fetchData();
  }

  function countUnique(property, data) {
    const reduced = Object.values(data).reduce((t, {property}) => t + {property}, 0);
  }

  function updateStats(data) {
    countUnique('city', data)
  }

  function fetchConcerts(currentYear) {
    if(!currentYear){
      currentYear = year;
    }
    setConcerts({loading: true, concerts: []});
    const fetchData = async () => {
      try {
        const { data: response } = await axios.get('/gigs?year=' + currentYear);
        setConcerts({loading: false, concerts: response});
        updateStats(response);
      } catch (error) {
        console.error(error.message);
      }
    }
    fetchData();
  }

  return (
    <div>
      <h2>Concert history</h2>
        <div>
        {!archives.loading && (
          <ul className="block-links">
            {Object.keys(yearList(archives.archives)).map(key => (
              <li key={key} className={year == key ? 'active' : ''}><a onClick={() => changeYear({ key })}>{key}</a></li>
            ))}
          </ul>
        )}
        {concerts.loading && <div className="loader-container"><span className="loader"></span></div>}
        {!concerts.loading && (
          <ConcertList concerts={concerts.concerts} bands={bands} venues={venues} cities={cities} countries={countries} />
        )}
        </div>
    </div>
  )
}