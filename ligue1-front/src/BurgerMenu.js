// src/BurgerMenu.js
import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import './BurgerMenu.css'; // Créez ce fichier CSS pour styliser le menu

const BurgerMenu = () => {
  const [isOpen, setIsOpen] = useState(false);

  const toggleMenu = () => {
    setIsOpen(!isOpen);
  };

  return (
    <div className={`burger-menu ${isOpen ? 'open' : ''}`}>
      <button className="burger-icon" onClick={toggleMenu}>
        ☰
      </button>
      <ul className="menu-list">
        <li>
          <Link to="/" onClick={toggleMenu}>
            Accueil
          </Link>
        </li>
        <li>
          <Link to="/equipes" onClick={toggleMenu}>
            Équipes
          </Link>
        </li>
        {/* Ajoutez d'autres liens selon votre besoin */}
      </ul>
    </div>
  );
};

export default BurgerMenu;
