import React from 'react';
import { Link } from "react-router-dom";

function MenuItem(props) {
    return <Link to={props.href} className="menu-item">{props.title}</Link>;
}

export default MenuItem;
