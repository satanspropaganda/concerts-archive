import React from "react";
import DataTable from 'react-data-table-component';
import { Link } from "react-router-dom";
export default function Bands({bands}) {
  const headings = [
    {
      name: 'Name',
      selector: row => row.name,
      sortable: true,
      cell: row => (
        <Link to={'/bands/' + row.id + '/'}>{row.name}</Link>
      ),
    },
    {
      name: 'Times seen',
      selector: row => row.shows,
      sortable: true
    },
    {
      name: 'Cities',
      selector: row => row.cities,
      sortable: true
    },
    {
      name: 'Countries',
      selector: row => row.countries,
      sortable: true
    }
  ];
return(
  <div>
    <h2>Bands</h2>
    <DataTable columns={headings} data={Object.values(bands)} defaultSortFieldId={1}/>
  </div>
)};