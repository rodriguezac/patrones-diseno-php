# Patrones de Diseño en PHP

Este repositorio contiene la implementación de diferentes **patrones de diseño en PHP**, desarrollados como parte de un ejercicio práctico. Incluyen ejemplos funcionales de los patrones **Factory, Adapter, Decorator y Strategy**.

## 📌 Ejercicios Implementados

### **Ejercicio 1 - Patrón Factory**
**Descripción:** Se utiliza el patrón **Factory** para crear personajes en función del nivel de dificultad.

- Personajes disponibles:
  - **Esqueleto** (nivel fácil)
  - **Zombi** (nivel difícil)
- Uso del `match` de PHP para manejar la creación de personajes.
- Manejo de errores en caso de nivel inválido.

📄 **Archivo:** `patron-factory.php`

### **Ejercicio 2 - Patrón Adapter**
**Descripción:** Implementación del patrón **Adapter** para compatibilizar archivos de Windows 7 en Windows 10.

- **`ArchivoWindows7`** representa un archivo antiguo.
- **`ArchivoNativoWindows10`** representa un archivo nativo en Windows 10.
- **`AdaptadorWindows7A10`** permite abrir archivos antiguos en Windows 10 sin modificar su estructura interna.
- **`GestorArchivosWindows10`** maneja la apertura de archivos sin importar su origen.

📄 **Archivo:** `patron-adapter.php`

### **Ejercicio 3 - Patrón Decorator**
**Descripción:** Se utiliza el patrón **Decorator** para extender habilidades de personajes.

- Personajes base:
  - **Guerrero**
  - **Mago**
- Decoradores disponibles:
  - **Espada** (Aumenta daño)
  - **Arco** (Ataque a distancia)
  - **Magia Avanzada** (Poderes mejorados para el mago)
  - **Escudo** (Mayor defensa para el guerrero)

📄 **Archivo:** `patron-decorator.php`



### **Ejercicio 5 - Patrón Strategy**
**Descripción:** Se implementa el patrón **Strategy** para manejar diferentes formatos de salida de un mensaje.

- Estrategias de salida implementadas:
  - **Consola** (`SalidaConsola`)
  - **JSON** (`SalidaJSON`)
  - **Archivo TXT** (`SalidaArchivo`)
  - **Archivo CSV** (`SalidaCSV`)
    
- Permite cambiar la estrategia en tiempo de ejecución sin modificar el código existente.

📄 **Archivo:** `patron-strategy.php`

## 🚀 Cómo Ejecutar los Ejercicios

1. Clona el repositorio:
   ```sh
   git clone https://github.com/tu-usuario/patrones-diseño-php.git
   cd patrones-diseño-php
   ```

2. Asegúrate de tener **PHP instalado** en tu sistema.

3. Ejecuta cada archivo de la siguiente manera:
   ```sh
   php patron-x.php
   ```
   (Reemplaza `X` por el nombre del tipo de patrón del ejercicio que deseas probar).

---


