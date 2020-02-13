import React from 'react';

function SelectField(props) {
    return (
        <div className="input-field">
            <label htmlFor={props.inputId}>{props.description}</label>
            <select id={props.inputId} name={props.inputId} required={props.required}>
                <option value="">Selecione uma opção</option>
                { props.options.map((option) => <option key={option.id} value={option.id}>{option.name}</option>) }
            </select>
        </div>
    )
}

export default SelectField;
