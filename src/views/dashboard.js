import React from "react";
import Map from "../components/map"
import { Link } from "react-router-dom";

export default function Dashboard({total, bands, cities, countries}) {
return(
  <div>
    <h2>Dashboard</h2>
    <section className="dashboard_stats">
			<Link to="concerts" className="stats_box stats_box-headline">
				<span className="stats_box-upper-text">
					Total Gigs
				</span>
				<p className="stats_box-stat">
					{total}
				</p>
			</Link>
			<div className="stats_row">
				<Link to="bands" className="stats_box" >
					<span className="stats_box-upper-text">
						Total Bands
					</span>
					<p className="stats_box-stat">
						{Object.keys(bands).length}
					</p>
				</Link>
				<Link to="cities" className="stats_box">
					<span className="stats_box-upper-text">
						Total Cities
					</span>
					<p className="stats_box-stat">
						{Object.keys(cities).length}
					</p>
				</Link>
				<Link to="countries" className="stats_box">
					<span className="stats_box-upper-text">
						Total Countries
					</span>
					<p className="stats_box-stat">
                        {Object.keys(countries).length}
					</p>
				</Link>
			</div>
		</section>
        <section>
            <div className="dashboard-map">
                <Map markers={cities} center={{lat: 53.480759300000003, lng: -2.2426305000000002}}/>
            </div>
        </section>
  </div>
)};