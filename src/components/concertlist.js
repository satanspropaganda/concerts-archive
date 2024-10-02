import React, { useEffect, useState } from "react";
import DataTable from 'react-data-table-component';
import moment from "moment";
import { Link } from "react-router-dom";
export default function ConcertList({ concerts, bands, venues, countries, cities }) {

  const headings = [
    {
      name: 'Date',
      selector: row => row.date,
      sortable: true,
      format: row => moment(row.date).format('Do MMMM YYYY')
    },
    {
      name: 'Name',
      selector: row => row.title,
    },
    {
      name: 'Bands',
      selector: row => row.bands,
      cell: row => (
        <p>
          {row.bands.map((bandId, index) => (
            <Link key={bandId} to={'/bands/' + bandId + '/'}>{ bands[bandId].name}{index != (row.bands.length-1) ? ', ' : ''}</Link>
          ))}
        </p>
        
      ),
    },
    {
      name: 'Venue',
      selector: row => row.venue,
      cell: row => (
        <Link key={row.venue} to={'/venues/' + row.venue + '/'}>{ venues[row.venue].name}</Link>
      ),
    },
    {
      name: 'City',
      selector: row => row.city,
      cell: row => (
        <Link key={row.city} to={'/cities/' + row.city + '/'}>{ cities[row.city].name}</Link>
      ),
    },
    {
      name: 'Country',
      selector: row => row.country,
      cell: row => (
        <Link key={row.country} to={'/countries/' + row.country + '/'}>{ countries[row.country].name}</Link>
      ),
    },
  ];

  return (
    <DataTable columns={headings} data={concerts} />
  )
}