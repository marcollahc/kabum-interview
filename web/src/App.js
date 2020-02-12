import React from 'react';
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";

import Header from './components/Header';
import MenuItem from './components/MenuItem';

import ClientsList from './pages/ClientsList';

import './App.css';

function App() {
  return (
    <Router>
      <Header>
        <MenuItem href="/clients/list" title="Lista cliente" />
        <MenuItem href="/clients/new" title="Novo cliente" />
        <MenuItem href="/exit" title="Sair" />
      </Header>

      <Switch>
        <Route path="/">
          <ClientsList />
        </Route>
        <Route path="/clients/list">
          <ClientsList />
        </Route>
        <Route path="/clients/new">
          <ClientsList />
        </Route>
        <Route path="/clients/show">
          <ClientsList />
        </Route>
        <Route path="/addresses/list/:client_id">
          <ClientsList />
        </Route>
        <Route path="/addresses/new/:client_id">
          <ClientsList />
        </Route>
        <Route path="/addresses/edit/:client_id/:id">
          <ClientsList />
        </Route>
      </Switch>
    </Router>
  );
}

export default App;
