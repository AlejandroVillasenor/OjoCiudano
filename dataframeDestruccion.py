import pandas as pd
import numpy as np

datos = pd.read_csv('antigrog.csv', header=0, encoding='latin-1')
#Destruccion
columnas = datos[['municipio', 'año', 'mes', 'Añomensual', 'HecMar_fum_SEDENA', 'clave_ent']][(datos['HecMar_fum_SEDENA'] != 0)]
columnas['id_droga'] = 2
columnas['id_organizacion'] = 3
columnas = columnas.rename(columns={"año":"anio","Añomensual":"anio_mensual","HecMar_fum_SEDENA":"hectareas"})
columnas.insert(0,"tipo_destruccion", "Fumigación")
#print(columnas)

columnas2 = datos[['municipio', 'año', 'mes', 'Añomensual', 'HecMar_man_SEDENA', 'clave_ent']][datos['HecMar_man_SEDENA'] != 0]
columnas2['id_droga'] = 2
columnas2['id_organizacion'] = 3
columnas2 = columnas2.rename(columns={"año":"anio","Añomensual":"anio_mensual","HecMar_man_SEDENA":"hectareas"})
columnas2.insert(0,"tipo_destruccion", "Mano de obra")
#print(columnas)

columnas3 = datos[['municipio', 'año', 'mes', 'Añomensual', 'HecAma_fum_SEDENA', 'clave_ent']][datos['HecAma_fum_SEDENA'] != 0]
columnas3['id_droga'] = 1
columnas3['id_organizacion'] = 3
columnas3 = columnas3.rename(columns={"año":"anio","Añomensual":"anio_mensual","HecAma_fum_SEDENA":"hectareas"})
columnas3.insert(0,"tipo_destruccion", "Fumigación")
#print(columnas)

columnas4 = datos[['municipio', 'año', 'mes', 'Añomensual', 'HecAma_man_SEDENA', 'clave_ent']][datos['HecAma_man_SEDENA'] != 0]
columnas4['id_droga'] = 1
columnas4['id_organizacion'] = 3
columnas4=columnas4.rename(columns={"año":"anio","Añomensual":"anio_mensual","HecAma_man_SEDENA":"hectareas"})
columnas4.insert(0,"tipo_destruccion", "Mano de obra")
#print(columnas)

combined_data = pd.concat([columnas, columnas2, columnas3, columnas4], ignore_index=True)
# Muestra el DataFrame combinado
combined_data=combined_data.rename(columns={"clave_ent": "id_estado"})
combined_data = combined_data[combined_data['id_estado'].notna()]
secuencia = range(1, len(combined_data) + 1)
combined_data.insert(0, 'id_destruccion', secuencia)

# Cambiar el tipo de dato de las columnas "id_estado" y "mes" a entero
combined_data['id_estado'] = combined_data['id_estado'].astype(int)
combined_data['mes'] = combined_data['mes'].astype(int)

print(combined_data)


combined_data.to_csv('Destruccion.csv', index=False)

