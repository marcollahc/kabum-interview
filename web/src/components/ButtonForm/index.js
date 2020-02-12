import React from 'react';

function ButtonForm(props) {
    return <button type="submit" class={`button ${props.additionalClass}`}>{props.description}</button>;
}

export default ButtonForm;
