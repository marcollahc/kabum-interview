import React from 'react';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

import Header from './components/Header';
import MenuItem from './components/MenuItem';

import Login from './pages/Login';
import ClientsList from './pages/ClientsList';
import ClientsForm from './pages/ClientsForm';
import AddressesList from './pages/AddressesList';
import AddressesForm from './pages/AddressesForm';

import './App.css';

function App(props) {
  return (
    <Router>
      <Header>
        <MenuItem href="/clients/list" title="Lista cliente" />
        <MenuItem href="/clients/new" title="Novo cliente" />
        <MenuItem href="/addresses/new" title="Novo endereço" />
        <MenuItem href="/" title="Sair" />
      </Header>
      <Switch>
        <Route path="/clients/list">
          <ClientsList />
        </Route>
        <Route path="/clients/new">
          <ClientsForm action="new" />
        </Route>
        <Route path="/clients/show/:id">
          <ClientsForm action="show" />
        </Route>
        <Route path="/addresses/list/:client_id">
          <AddressesList />
        </Route>
        <Route path="/addresses/new">
          <AddressesForm action="new" />
        </Route>
        <Route path="/addresses/show/:client_id/:id">
          <AddressesForm action="show" />
        </Route>
        <Route path="/">
          <Login header="ignore" />
        </Route>
      </Switch>
    </Router>
  );
}

export default App;
