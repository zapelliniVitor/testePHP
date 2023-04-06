SELECT Tb_banco.nome, Tb_convenio.verba, 
       MIN(Tb_contrato.data_inclusao) as data_inclusao_minima, 
       MAX(Tb_contrato.data_inclusao) as data_inclusao_maxima, 
       SUM(Tb_contrato.valor) as valor_total 
FROM Tb_banco 
JOIN Tb_convenio ON Tb_banco.codigo = Tb_convenio.banco 
JOIN Tb_convenio_servico ON Tb_convenio_servico.convenio = Tb_convenio.convenio 
JOIN Tb_contrato ON Tb_contrato.convenio_servico = Tb_convenio_servico.codigo 
GROUP BY Tb_banco.nome, Tb_convenio.verba;
