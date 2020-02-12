import React from 'react';

function InputField(props) {
    return (
        <div className="input-field">
            <label htmlFor={props.inputId}>{props.description}</label>
            <input type={props.type} id={props.inputId} name={props.inputId} placeholder={props.placeholder} required={props.required} />
        </div>
    )
}

export default InputField;
