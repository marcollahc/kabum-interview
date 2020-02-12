import React from 'react';
import InputField from '../../components/InputField';
import ButtonForm from '../../components/ButtonForm';

function Login() {
    async function handleSubmit() {

    }

    return (
        <div className="form-login">
            <form onSubmit={handleSubmit} method="POST">
                <h1>Acesso restrito</h1>
                <InputField type="email" inputId="login" description="Login" placeholder="Digite o seu login" required="required" />
                <InputField type="password" inputId="passkey" description="Senha" placeholder="Digite a sua senha" required="required" />
                <ButtonForm description="Acessar" additionalClass="button-confirm" />
            </form>
        </div>
    );
}

export default Login;
