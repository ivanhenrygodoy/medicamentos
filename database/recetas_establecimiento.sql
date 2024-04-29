#Despliega las las recetas que fueron emitidas por el establecimiento con id=1 
SELECT recetas.created_at as fechaCreacionReceta,recetas.numero as numeroReceta, pacientes.nombres as pacientenombre, medicos.nombres as mednombre, establecimientos.nombre as establecimientonombre, COUNT(*) medicamentos
FROM recetas inner join medicos on recetas.id_medico = medicos.id 
inner join pacientes on recetas.id_paciente = pacientes.id 
inner join establecimientos on recetas.id_establecimiento=establecimientos.id 

where establecimientos.id = 1;