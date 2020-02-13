import React from 'react';
import ListActionItem from '../../components/ListActionItem';
import ListTitleItem from '../../components/ListTitleItem';

function AddressesList() {
    return (
        <section>
            <h1>Endereços de "Cliente"</h1>
            <div className="content-list">
                <div className="content-list-title">
                    <ListTitleItem title="Título" />
                </div>
                <div className="content-list-item">
                    <ListTitleItem title="Título" />
                    <ListActionItem href="/addresses/show/:client_id/:id" title="Editar" icon="visibility" />
                    <ListActionItem href="/addresses/remove/:client_id/:id" title="Excluir" icon="delete" />
                </div>
            </div>
        </section>
    );
}

export default AddressesList;
