import React from 'react';
import { Link } from 'react-router-dom';

function ListActionItem(props) {
    return (
        <div className="action">
            <Link to={props.href} className="action-icon">
                <i className="material-icons" alt={props.title} title={props.title}>{props.icon}</i>
            </Link>
        </div>
    );
}

export default ListActionItem;
