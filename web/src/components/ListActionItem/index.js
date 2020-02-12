import React from 'react';

function ListActionItem(props) {
    return (
        <div className="action">
            <a href={props.url} className="action-icon">
                <i class="material-icons" alt={props.title} title={props.title}>{props.icon}</i>
            </a>
        </div>
    );
}

export default ListActionItem;
