TrabBiblioteca
==============

# Utilização

Para utilizar a biblioteca, basta incluir-la em seu script php como abaixo:

    include('../build/package.phar');

# Construção

Para construir a biblioteca e gerar o arquivo .phar, navege até a raiz do projeto e rode:

    phing

A biblioteca será construida e estará disponível no diretório /build/package.phar

Requerimentos minimos:
=====================
Servidor Web
- PHP 5.3 ou versão superior
   - short_tags deve estar ativado em seu php.ini
   - PEAR instalado
   - Em windows, a pasta do php deve estar na variável de ambiente "Path"
   - A pasta do PEAR deve estar no include_path do php.ini

Para construção da biblioteca:

 - Phing
 - PHPUnit


License
========================================
Biblioteca para manipulação de cartas
Copyright (C) 2012  Rafael Tavares Amorim e Marcelo Maia Lopes

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.