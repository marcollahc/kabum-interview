import React from 'react';
import InputField from '../../components/InputField';
import SelectField from '../../components/SelectField';
import ButtonForm from '../../components/ButtonForm';
import StateProvince from '../../utils/StateProvince';

function AddressesForm(props) {
    let title, button, clients;

    if (props.action === 'new') {
        title = <h1>Novo endereço</h1>;
        button = <ButtonForm description="Cadastar endereço" additionalClass="button-confirm" />;
        clients = <SelectField inputId="client_id" description="Cliente" placeholder="Escolha o cliente" required="required" options={[]} />
    } else {
        title = <h1>Detalhes do endereço</h1>;
        button = <ButtonForm description="Salvar endereço" additionalClass="button-confirm" />;
        clients = "";
    }

    return (
        <section>
            {title}
            <form action="POST" className="form-content">
                {clients}
                <InputField type="text" inputId="street" description="Endereço" placeholder="Digite o seu endereço" required="required" />
                <InputField type="tel" inputId="birthdate" description="Número" placeholder="Digite o número de sua residência" required="required" />
                <InputField type="text" inputId="complement" description="Complemento" placeholder="Digite o seu complemento" />
                <InputField type="text" inputId="district" description="Bairro" placeholder="Digite o seu bairro" required="required" />
                <InputField type="text" inputId="city" description="Cidade" placeholder="Digite a sua cidade" required="required" />
                <SelectField inputId="state_province" description="Estado/Província" placeholder="Escolha o seu estado/província" required="required" options={StateProvince}/>
                <InputField type="tel" inputId="zipcode" description="CEP" placeholder="Digite o seu CEP" required="required" maxlength="9" />
                {button}
            </form>
        </section>
    );
}

export default AddressesForm;
