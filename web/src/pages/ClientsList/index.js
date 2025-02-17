import React from 'react';
import ListActionItem from '../../components/ListActionItem';
import ListTitleItem from '../../components/ListTitleItem';

function ClientsList() {
    return (
        <section>
            <h1>Clientes</h1>
            <div className="content-list">
                <div className="content-list-title">
                    <ListTitleItem title="Título" />
                </div>
                <div className="content-list-item">
                    <ListTitleItem title="Título" />
                    <ListActionItem href="/addresses/list/:id" title="Endereços" icon="location_on" />
                    <ListActionItem href="/clients/show/:id" title="Editar" icon="visibility" />
                    <ListActionItem href="/clients/remove/:id" title="Excluir" icon="delete" />
                </div>
            </div>
        </section>
    );
}

export default ClientsList;
