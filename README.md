# Manual

### Agregar permisos a los usuarios administradores

1. Buscar en la base de datos RRHH los trabajadores de SSMA

    ```
      SELECT * FROM rrhh.tabla_aquarius 
      WHERE rrhh.tabla_aquarius.dcostos LIKE '%<PROYECTO>%
    ```
2. Extraer los dni que desea agregar 
    ```
       dni 
    --------
    77100151
    789465258
    ```

3. Realizar los insert en la base de datos SSMA en la tabla ROLE 
    ```
    INSERT INTO role(idTypeRole,dni) VALUES (2,DNI1) , (2,DNI2) , ... , (N,DNI N);
    ```
