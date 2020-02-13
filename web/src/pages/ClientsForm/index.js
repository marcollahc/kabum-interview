import React from 'react';
import InputField from '../../components/InputField';
import ButtonForm from '../../components/ButtonForm';

function ClientsForm(props) {
    let title, button;

    if (props.action === 'new') {
        title = <h1>Novo cliente</h1>;
        button = <ButtonForm description="Cadastar cliente" additionalClass="button-confirm" />;
    } else {
        title = <h1>Detalhes do cliente</h1>;
        button = <ButtonForm description="Salvar cliente" additionalClass="button-confirm" />;
    }

    return (
        <section>
            {title}
            <form action="POST" className="form-content">
                <InputField type="text" inputId="name" description="Nome" placeholder="Digite o seu nome" required="required" />
                <InputField type="date" inputId="birthdate" description="Data de nascimento" placeholder="Digite a sua data de nascimento" required="required" maxlength="10" />
                <InputField type="tel" inputId="cpf" description="CPF" placeholder="Digite o seu CPF" required="required" maxlength="14" />
                <InputField type="text" inputId="rg" description="RG" placeholder="Digite o seu RG" required="required" maxlength="12" />
                <InputField type="tel" inputId="phone" description="Telefone" placeholder="Digite o seu telefone" required="required" maxlength="15" />
                {button}
            </form>
        </section>
    );
}

export default ClientsForm;
