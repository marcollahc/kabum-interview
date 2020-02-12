import React from 'react';
import { BrowserRouter as Router, Switch, Route, withRouter } from "react-router-dom";

import Header from './components/Header';
import MenuItem from './components/MenuItem';

import Login from './pages/Login';
import ClientsList from './pages/ClientsList';

import './App.css';

function App() {
  return (
    <Router>
      <Header>
        <MenuItem href="/clients/list" title="Lista cliente" />
        <MenuItem href="/clients/new" title="Novo cliente" />
        <MenuItem href="/" title="Sair" />
      </Header>
      <Switch>
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
        <Route path="/">
          <Login />
        </Route>
      </Switch>
    </Router>
  );
}

export default App;
