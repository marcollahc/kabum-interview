import React from 'react';

function ButtonForm(props) {
    return <button type="submit" className={`button ${props.additionalClass}`}>{props.description}</button>;
}

export default ButtonForm;
