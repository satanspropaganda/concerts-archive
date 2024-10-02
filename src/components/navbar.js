import React from "react";
import { NavLink } from "react-router-dom";

export default function Navbar() {
    return (
    <div className="concerts_navigation">
    <nav className="navbar with-indicator">
      <NavLink to="/">
        Dashboard
      </NavLink>

      <NavLink to="/concerts">
        Concerts
      </NavLink>

      <NavLink to="/bands">
        Bands
      </NavLink>

      <NavLink to="/Countries">
        Countries
      </NavLink>

      <NavLink to="/cities">
        Cities
      </NavLink>

      <NavLink to="/venues">
        Venues
      </NavLink>

    </nav> 
    </div>
    )
};
    