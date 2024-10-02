import React from "react";
import DataTable from 'react-data-table-component';
import { Link } from "react-router-dom";
export default function Archive({archiveTitle, items}) {
  const headings = [
    {
      name: archiveTitle,
      selector: row => row.name,
      sortable: true,
      cell: row => (
        <Link to={'./'+row.id}>{row.name}</Link>
      ),
    },
    {
      name: 'Shows seen',
      selector: row => row.shows,
      sortable: true
    }
  ];
  return(
    <div>
      <h2>{archiveTitle}</h2>
      <DataTable columns={headings} data={Object.values(items)} defaultSortFieldId={1}/>
    </div>
  )};