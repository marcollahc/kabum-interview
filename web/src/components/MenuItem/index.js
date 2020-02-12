import React from 'react';
import { Link } from "react-router-dom";

function MenuItem(props) {
    return (
        <div>
            <Link to={props.href} className="menu-item">{props.title}</Link>
        </div>
    );
}

export default MenuItem;
