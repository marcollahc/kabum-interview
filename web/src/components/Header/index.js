import React from 'react';

function Header(props) {
    return (
        <header>
          <nav>{ props.children }</nav>
        </header>
    );
}

export default Header;
