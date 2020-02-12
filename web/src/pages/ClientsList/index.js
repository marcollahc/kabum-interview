import React from 'react';
import ListActionItem from '../../components/ListActionItem';
import ListTitleItem from '../../components/ListTitleItem';

function Clients() {
    return (
        <section>
            <h1>Teste</h1>
            <div className="content-list">
                <div className="content-list-title">
                    <ListTitleItem>Título</ListTitleItem>
                </div>
                <div className="content-list-item">
                    <ListTitleItem>Título</ListTitleItem>
                    <ListActionItem href="clients/addresses/:id" title="Endereços" icon="location_on" />
                    <ListActionItem href="clients/edit/:id" title="Editar" icon="visibility" />
                    <ListActionItem href="clients/remove/:id" title="Excluir" icon="delete" />
                </div>
            </div>
        </section>
    );
}

export default Clients;
