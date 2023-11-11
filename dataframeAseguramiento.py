import pandas as pd
import numpy as np

datos = pd.read_csv('antigrog.csv', header=0, encoding='latin-1')

#Policia federal
columnas2 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_1', 'clave_ent']][(datos['pf_1'] != 0)]
columnas2['id_droga'] = 1
columnas2['id_organizacion'] = 1
columnas2 = columnas2.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_1":"cantidad"})
columnas2.insert(0,"tipo_aseguramiento", "Plantíos")
#print(columnas2)

columnas3 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_2', 'clave_ent']][(datos['pf_2'] != 0)]
columnas3['id_droga'] = 2
columnas3['id_organizacion'] = 1
columnas3 = columnas3.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_2":"cantidad"})
columnas3.insert(0,"tipo_aseguramiento", "Plantíos")

columnas4 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_4', 'clave_ent']][(datos['pf_4'] != 0)]
columnas4['id_droga'] = 3
columnas4['id_organizacion'] = 1
columnas4 = columnas4.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_4":"cantidad"})
columnas4.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas5 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_5', 'clave_ent']][(datos['pf_5'] != 0)]
columnas5['id_droga'] = 4
columnas5['id_organizacion'] = 1
columnas5 = columnas5.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_5":"cantidad"})
columnas5.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas6 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_6', 'clave_ent']][(datos['pf_6'] != 0)]
columnas6['id_droga'] = 5
columnas6['id_organizacion'] = 1
columnas6 = columnas6.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_6":"cantidad"})
columnas6.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas7 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_7', 'clave_ent']][(datos['pf_7'] != 0)]
columnas7['id_droga'] = 6
columnas7['id_organizacion'] = 1
columnas7 = columnas7.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_7":"cantidad"})
columnas7.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas8 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_8', 'clave_ent']][(datos['pf_8'] != 0)]
columnas8['id_droga'] = 7
columnas8['id_organizacion'] = 1
columnas8 = columnas8.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_8":"cantidad"})
columnas8.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas9 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_9', 'clave_ent']][(datos['pf_9'] != 0)]
columnas9['id_droga'] = 8
columnas9['id_organizacion'] = 1
columnas9 = columnas9.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_9":"cantidad"})
columnas9.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas10 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_10', 'clave_ent']][(datos['pf_10'] != 0)]
columnas10['id_droga'] = 9
columnas10['id_organizacion'] = 1
columnas10 = columnas10.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_10":"cantidad"})
columnas10.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas11 = datos[['municipio', 'año', 'mes', 'Añomensual', 'pf_11', 'clave_ent']][(datos['pf_11'] != 0)]
columnas11['id_droga'] = 10
columnas11['id_organizacion'] = 1
columnas11 = columnas11.rename(columns={"año":"anio","Añomensual":"anio_mensual","pf_11":"cantidad"})
columnas11.insert(0,"tipo_aseguramiento", "Laboratorio")

#Guardia Nacional
columnas12 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_1', 'clave_ent']][(datos['gn_1'] != 0)]
columnas12['id_droga'] = 1
columnas12['id_organizacion'] = 2
columnas12 = columnas12.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_1":"cantidad"})
columnas12.insert(0,"tipo_aseguramiento", "Plantíos")

columnas13 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_2', 'clave_ent']][(datos['gn_2'] != 0)]
columnas13['id_droga'] = 2
columnas13['id_organizacion'] = 2
columnas13 = columnas13.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_2":"cantidad"})
columnas13.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas14 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_4', 'clave_ent']][(datos['gn_4'] != 0)]
columnas14['id_droga'] = 3
columnas14['id_organizacion'] = 2
columnas14 = columnas14.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_4":"cantidad"})
columnas14.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas15 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_6', 'clave_ent']][(datos['gn_6'] != 0)]
columnas15['id_droga'] = 5
columnas15['id_organizacion'] = 2
columnas15 = columnas15.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_6":"cantidad"})
columnas15.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas16 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_8', 'clave_ent']][(datos['gn_8'] != 0)]
columnas16['id_droga'] = 7
columnas16['id_organizacion'] = 2
columnas16 = columnas16.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_8":"cantidad"})
columnas16.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas17 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_9', 'clave_ent']][(datos['gn_9'] != 0)]
columnas17['id_droga'] = 8
columnas17['id_organizacion'] = 2
columnas17 = columnas17.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_9":"cantidad"})
columnas17.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas18 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_10', 'clave_ent']][(datos['gn_10'] != 0)]
columnas18['id_droga'] = 9
columnas18['id_organizacion'] = 2
columnas18 = columnas18.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_10":"cantidad"})
columnas18.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas19 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_11', 'clave_ent']][(datos['gn_11'] != 0)]
columnas19['id_droga'] = 10
columnas19['id_organizacion'] = 2
columnas19 = columnas19.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_11":"cantidad"})
columnas19.insert(0,"tipo_aseguramiento", "Laboratorios")

columnas20 = datos[['municipio', 'año', 'mes', 'Añomensual', 'gn_12', 'clave_ent']][(datos['gn_12'] != 0)]
columnas20['id_droga'] = 11
columnas20['id_organizacion'] = 2
columnas20 = columnas20.rename(columns={"año":"anio","Añomensual":"anio_mensual","gn_12":"cantidad"})
columnas20.insert(0,"tipo_aseguramiento", "Laboratorios")

#SEDENA
columnas21 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlaMar_fum_SEDENA', 'clave_ent']][(datos['PlaMar_fum_SEDENA'] != 0)]
columnas21['id_droga'] = 2
columnas21['id_organizacion'] = 3
columnas21 = columnas21.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlaMar_fum_SEDENA":"cantidad"})
columnas21.insert(0,"tipo_aseguramiento", "Plantíos fumigados")

columnas22 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlaMar_man_SEDENA', 'clave_ent']][(datos['PlaMar_man_SEDENA'] != 0)]
columnas22['id_droga'] = 2
columnas22['id_organizacion'] = 3
columnas22 = columnas22.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlaMar_man_SEDENA":"cantidad"})
columnas22.insert(0,"tipo_aseguramiento", "Plantíos por mano de obra")

columnas25 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlaAma_fum_SEDENA', 'clave_ent']][(datos['PlaAma_fum_SEDENA'] != 0)]
columnas25['id_droga'] = 1
columnas25['id_organizacion'] = 3
columnas25 = columnas25.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlaAma_fum_SEDENA":"cantidad"})
columnas25.insert(0,"tipo_aseguramiento", "Plantíos fumigados")

columnas26 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlaAma_man_SEDENA', 'clave_ent']][(datos['PlaAma_man_SEDENA'] != 0)]
columnas26['id_droga'] = 1
columnas26['id_organizacion'] = 3
columnas26 = columnas26.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlaAma_man_SEDENA":"cantidad"})
columnas26.insert(0,"tipo_aseguramiento", "Plantíos por mano de obra")

columnas29 = datos[['municipio', 'año', 'mes', 'Añomensual', 'LabHer_SEDENA', 'clave_ent']][(datos['LabHer_SEDENA'] != 0)]
columnas29['id_droga'] = 1
columnas29['id_organizacion'] = 3
columnas29 = columnas29.rename(columns={"año":"anio","Añomensual":"anio_mensual","LabHer_SEDENA":"cantidad"})
columnas29.insert(0,"tipo_aseguramiento", "Laboratorios")

columnas30 = datos[['municipio', 'año', 'mes', 'Añomensual', 'LabMet_SEDENA', 'clave_ent']][(datos['LabMet_SEDENA'] != 0)]
columnas30['id_droga'] = 13
columnas30['id_organizacion'] = 3
columnas30 = columnas30.rename(columns={"año":"anio","Añomensual":"anio_mensual","LabMet_SEDENA":"cantidad"})
columnas30.insert(0,"tipo_aseguramiento", "Laboratorios")

columnas31 = datos[['municipio', 'año', 'mes', 'Añomensual', 'LabCoc_SEDENA', 'clave_ent']][(datos['LabCoc_SEDENA'] != 0)]
columnas31['id_droga'] = 14
columnas31['id_organizacion'] = 3
columnas31 = columnas31.rename(columns={"año":"anio","Añomensual":"anio_mensual","LabCoc_SEDENA":"cantidad"})
columnas31.insert(0,"tipo_aseguramiento", "Laboratorios")

#Racso
columnas32 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseMar_SEDENA', 'clave_ent']][(datos['AseMar_SEDENA'] != 0)]
columnas32['id_droga'] = 7
columnas32['id_organizacion'] = 3
columnas32 = columnas32.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseMar_SEDENA":"cantidad"})
columnas32.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas33 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseCoc_SEDENA', 'clave_ent']][(datos['AseCoc_SEDENA'] != 0)]
columnas33['id_droga'] = 3
columnas33['id_organizacion'] = 3
columnas33 = columnas33.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseCoc_SEDENA":"cantidad"})
columnas33.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas34 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseHer_SEDENA', 'clave_ent']][(datos['AseHer_SEDENA'] != 0)]
columnas34['id_droga'] = 5
columnas34['id_organizacion'] = 3
columnas34 = columnas34.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseHer_SEDENA":"cantidad"})
columnas34.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas35 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseGomOpio_SEDENA', 'clave_ent']][(datos['AseGomOpio_SEDENA'] != 0)]
columnas35['id_droga'] = 15
columnas35['id_organizacion'] = 3
columnas35 = columnas35.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseGomOpio_SEDENA":"cantidad"})
columnas35.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas36 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseMet_SEDENA', 'clave_ent']][(datos['AseMet_SEDENA'] != 0)]
columnas36['id_droga'] = 8
columnas36['id_organizacion'] = 3
columnas36 = columnas36.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseMet_SEDENA":"cantidad"})
columnas36.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas37 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseFen_SEDENA', 'clave_ent']][(datos['AseFen_SEDENA'] != 0)]
columnas37['id_droga'] = 11
columnas37['id_organizacion'] = 3
columnas37 = columnas37.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseFen_SEDENA":"cantidad"})
columnas37.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas38 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PasFen_SEDENA', 'clave_ent']][(datos['PasFen_SEDENA'] != 0)]
columnas38['id_droga'] = 16
columnas38['id_organizacion'] = 3
columnas38 = columnas38.rename(columns={"año":"anio","Añomensual":"anio_mensual","PasFen_SEDENA":"cantidad"})
columnas38.insert(0,"tipo_aseguramiento", "Pastillas")

columnas39 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AmpFen_SEDENA', 'clave_ent']][(datos['AmpFen_SEDENA'] != 0)]
columnas39['id_droga'] = 17
columnas39['id_organizacion'] = 3
columnas39 = columnas39.rename(columns={"año":"anio","Añomensual":"anio_mensual","AmpFen_SEDENA":"cantidad"})
columnas39.insert(0,"tipo_aseguramiento", "Pastillas")

columnas40 = datos[['municipio', 'año', 'mes', 'Añomensual', 'SemMar_SEDENA', 'clave_ent']][(datos['SemMar_SEDENA'] != 0)]
columnas40['id_droga'] = 18
columnas40['id_organizacion'] = 3
columnas40 = columnas40.rename(columns={"año":"anio","Añomensual":"anio_mensual","SemMar_SEDENA":"cantidad"})
columnas40.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas41 = datos[['municipio', 'año', 'mes', 'Añomensual', 'SemAma_SEDENA', 'clave_ent']][(datos['SemAma_SEDENA'] != 0)]
columnas41['id_droga'] = 19
columnas41['id_organizacion'] = 3
columnas41 = columnas41.rename(columns={"año":"anio","Añomensual":"anio_mensual","SemAma_SEDENA":"cantidad"})
columnas41.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas42 = datos[['municipio', 'año', 'mes', 'Añomensual', 'IncMar_SEDENA', 'clave_ent']][(datos['IncMar_SEDENA'] != 0)]
columnas42['id_droga'] = 20
columnas42['id_organizacion'] = 3
columnas42 = columnas42.rename(columns={"año":"anio","Añomensual":"anio_mensual","IncMar_SEDENA":"cantidad"})
columnas42.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas43 = datos[['municipio', 'año', 'mes', 'Añomensual', 'IncCoc_SEDENA', 'clave_ent']][(datos['IncCoc_SEDENA'] != 0)]
columnas43['id_droga'] = 21
columnas43['id_organizacion'] = 3
columnas43 = columnas43.rename(columns={"año":"anio","Añomensual":"anio_mensual","IncCoc_SEDENA":"cantidad"})
columnas43.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas44 = datos[['municipio', 'año', 'mes', 'Añomensual', 'IncHer_SEDENA', 'clave_ent']][(datos['IncHer_SEDENA'] != 0)]
columnas44['id_droga'] = 22
columnas44['id_organizacion'] = 3
columnas44 = columnas44.rename(columns={"año":"anio","Añomensual":"anio_mensual","IncHer_SEDENA":"cantidad"})
columnas44.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas45 = datos[['municipio', 'año', 'mes', 'Añomensual', 'IncGomOpio_SEDENA', 'clave_ent']][(datos['IncGomOpio_SEDENA'] != 0)]
columnas45['id_droga'] = 23
columnas45['id_organizacion'] = 3
columnas45 = columnas45.rename(columns={"año":"anio","Añomensual":"anio_mensual","IncGomOpio_SEDENA":"cantidad"})
columnas45.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas46 = datos[['municipio', 'año', 'mes', 'Añomensual', 'IncMet_SEDENA', 'clave_ent']][(datos['IncMet_SEDENA'] != 0)]
columnas46['id_droga'] = 24
columnas46['id_organizacion'] = 3
columnas46 = columnas46.rename(columns={"año":"anio","Añomensual":"anio_mensual","IncMet_SEDENA":"cantidad"})
columnas46.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas47 = datos[['municipio', 'año', 'mes', 'Añomensual', 'IncSemMar_SEDENA', 'clave_ent']][(datos['IncSemMar_SEDENA'] != 0)]
columnas47['id_droga'] = 25
columnas47['id_organizacion'] = 3
columnas47 = columnas47.rename(columns={"año":"anio","Añomensual":"anio_mensual","IncSemMar_SEDENA":"cantidad"})
columnas47.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas48 = datos[['municipio', 'año', 'mes', 'Añomensual', 'IncSemAma_SEDENA', 'clave_ent']][(datos['IncSemAma_SEDENA'] != 0)]
columnas48['id_droga'] = 26
columnas48['id_organizacion'] = 3
columnas48 = columnas48.rename(columns={"año":"anio","Añomensual":"anio_mensual","IncSemAma_SEDENA":"cantidad"})
columnas48.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas49 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseMar_SEMAR', 'clave_ent']][(datos['AseMar_SEMAR'] != 0)]
columnas49['id_droga'] = 7
columnas49['id_organizacion'] = 4
columnas49 = columnas49.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseMar_SEMAR":"cantidad"})
columnas49.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas50 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseCoc_SEMAR', 'clave_ent']][(datos['AseCoc_SEMAR'] != 0)]
columnas50['id_droga'] = 3
columnas50['id_organizacion'] = 4
columnas50 = columnas50.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseCoc_SEMAR":"cantidad"})
columnas50.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas51 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseMet_SEMAR', 'clave_ent']][(datos['AseMet_SEMAR'] != 0)]
columnas51['id_droga'] = 8
columnas51['id_organizacion'] = 4
columnas51 = columnas51.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseMet_SEMAR":"cantidad"})
columnas51.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas52 = datos[['municipio', 'año', 'mes', 'Añomensual', 'SemMar_SEMAR', 'clave_ent']][(datos['SemMar_SEMAR'] != 0)]
columnas52['id_droga'] = 18
columnas52['id_organizacion'] = 4
columnas52 = columnas52.rename(columns={"año":"anio","Añomensual":"anio_mensual","SemMar_SEMAR":"cantidad"})
columnas52.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas53 = datos[['municipio', 'año', 'mes', 'Añomensual', 'AseHer_SEMAR', 'clave_ent']][(datos['AseHer_SEMAR'] != 0)]
columnas53['id_droga'] = 5
columnas53['id_organizacion'] = 4
columnas53 = columnas53.rename(columns={"año":"anio","Añomensual":"anio_mensual","AseHer_SEMAR":"cantidad"})
columnas53.insert(0,"tipo_aseguramiento", "Kilogramos")

columnas54 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlantiosAma_SEMAR', 'clave_ent']][(datos['PlantiosAma_SEMAR'] != 0)]
columnas54['id_droga'] = 1
columnas54['id_organizacion'] = 4
columnas54 = columnas54.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlantiosAma_SEMAR":"cantidad"})
columnas54.insert(0,"tipo_aseguramiento", "Plantíos")

columnas55 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlantasAma_SEMAR', 'clave_ent']][(datos['PlantasAma_SEMAR'] != 0)]
columnas55['id_droga'] = 27
columnas55['id_organizacion'] = 4
columnas55 = columnas55.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlantasAma_SEMAR":"cantidad"})
columnas55.insert(0,"tipo_aseguramiento", "Plantas")

columnas56 = datos[['municipio', 'año', 'mes', 'Añomensual', 'M2Ama_SEMAR', 'clave_ent']][(datos['M2Ama_SEMAR'] != 0)]
columnas56['id_droga'] = 1
columnas56['id_organizacion'] = 4
columnas56 = columnas56.rename(columns={"año":"anio","Añomensual":"anio_mensual","M2Ama_SEMAR":"cantidad"})
columnas56.insert(0,"tipo_aseguramiento", "Por metros cuadrados")

columnas57 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlantiosMar_SEMAR', 'clave_ent']][(datos['PlantiosMar_SEMAR'] != 0)]
columnas57['id_droga'] = 2
columnas57['id_organizacion'] = 4
columnas57 = columnas57.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlantiosMar_SEMAR":"cantidad"})
columnas57.insert(0,"tipo_aseguramiento", "Plantíos")

columnas58 = datos[['municipio', 'año', 'mes', 'Añomensual', 'PlantasMar_SEMAR', 'clave_ent']][(datos['PlantasMar_SEMAR'] != 0)]
columnas58['id_droga'] = 7
columnas58['id_organizacion'] = 4
columnas58 = columnas58.rename(columns={"año":"anio","Añomensual":"anio_mensual","PlantasMar_SEMAR":"cantidad"})
columnas58.insert(0,"tipo_aseguramiento", "Plantas")

columnas59 = datos[['municipio', 'año', 'mes', 'Añomensual', 'M2Mar_SEMAR', 'clave_ent']][(datos['M2Mar_SEMAR'] != 0)]
columnas59['id_droga'] = 2
columnas59['id_organizacion'] = 4
columnas59 = columnas59.rename(columns={"año":"anio","Añomensual":"anio_mensual","M2Mar_SEMAR":"cantidad"})
columnas59.insert(0,"tipo_aseguramiento", "Por metros cuadrados")

combined_data = pd.concat([columnas2, columnas3, columnas4, columnas5, columnas6, columnas7, columnas8, columnas9, columnas10,
                           columnas11, columnas12, columnas13, columnas14, columnas15, columnas16, columnas17, columnas18, columnas19,
                           columnas20, columnas21, columnas22, columnas25, columnas26, columnas29, columnas30, columnas31, columnas32,
                           columnas33, columnas34, columnas35, columnas36, columnas37, columnas38, columnas39, columnas40, columnas41,
                           columnas42, columnas43, columnas44, columnas45, columnas46, columnas47, columnas48, columnas49, columnas50,
                           columnas51, columnas52, columnas53, columnas54, columnas55, columnas56, columnas57, columnas58, columnas59], 
                          ignore_index=True)
# Muestra el DataFrame combinado
combined_data=combined_data.rename(columns={"clave_ent": "id_estado"})
combined_data = combined_data[combined_data['id_estado'].notna()]

secuencia = range(1, len(combined_data) + 1)
combined_data.insert(0, 'id_aseguramiento', secuencia)

# Cambiar el tipo de dato de las columnas "id_estado" y "mes" a entero
combined_data['id_estado'] = combined_data['id_estado'].astype(int)
combined_data['mes'] = combined_data['mes'].astype(int)

# Cambiar los valores nulos en la columna "municipio" por 'No Especificado'
combined_data['municipio'].fillna('No Especificado', inplace=True)

print(combined_data)
combined_data.to_csv('Aseguramiento.csv', index=False)
