<?php

class ComprasVendas {

    private $connection;
    public $table = 'compras_e_vendas';

    public function __construct(PDO $pdo)
    {
        $this->connection = $pdo;
    }

    public function dropTable()
    {
        return $this->connection->query("DROP TABLE IF EXISTS $this->table");
    }

    public function createTable()
    {
        return $this->connection->query("CREATE TABLE IF NOT EXISTS $this->table (
                id SERIAL PRIMARY KEY,
                ativo VARCHAR(50) NOT NULL,
                tipo_da_operacao VARCHAR(50),
                quantidade INTEGER NOT NULL,
                preco_unitario DECIMAL(12,2) NOT NULL,
                preco_total DECIMAL(12,2) NOT NULL,
                data DATE NOT NULL
            );
        ");
    }

    public function getAll()
    {
        return $this->connection->query("SELECT * FROM $this->table ORDER BY data DESC;");
    }

    public function insert($obj)
    {
        $statement = $this->connection->prepare("INSERT INTO $this->table (ativo, tipo_da_operacao, quantidade, preco_unitario, preco_total, data) VALUES (:ativo, :tipo, :qtd, :pu, :pt, :data);");
        $statement->bindParam(":ativo", $obj['ativo']);
        $statement->bindParam(":tipo", $obj['tipo_da_operacao']);
        $statement->bindParam(":qtd", $obj['quantidade']);
        $statement->bindParam(":pu", $obj['preco_unitario']);
        $statement->bindParam(":pt", $obj['preco_total']);
        $statement->bindParam(":data", $obj['data']);
        return $statement->execute();
    }

    public function delete($id)
    {
        $statement = $this->connection->prepare("DELETE FROM $this->table WHERE id = ?");
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function getPatrimonioTotalNaData($data)
    {
        $dados = [];
        $query = "
            select sum(preco_total) as total 
            from compras_e_vendas 
            where data < '$data';
        ";
        foreach ($this->connection->query($query) as $linha) {
            $dados['total'] = $linha['total'];
        }
        return $dados;
    }

    public function getPatrimonioTotalDoAtivoNaData($ativo = null, $data = null)
    {
        if (empty($data)) {
            $data = date("Y-m-d");
        }
        $dados = [];
        $query = "
            select sum(preco_total) as total 
            from compras_e_vendas 
            where ativo = '$ativo' and data < '$data';
        ";
        foreach ($this->connection->query($query) as $linha) {
            $dados['total'] = $linha['total'];
        }
        return $dados;
    }

    public function getPatrimonioAgrupadoPorAtivos()
    {
        $dados = [];
        $query = "
            select ativo, 
                   sum(quantidade) as cotas, 
                   sum(preco_total) as total, 
                   (sum(preco_total) / sum(quantidade)) ::decimal(12,2) as preco_medio, 
                   max(data) as ultima_compra, 
                   min(data) as primeira_compra 
            from compras_e_vendas 
            group by 1 
            order by 3 desc;
        ";

        foreach ($this->connection->query($query) as $linha) {
            $dados[] = [
                'ativo' => $linha['ativo'], 
                'total' => $linha['total'], 
                'cotas' => $linha['cotas'], 
                'preco_medio' => $linha['preco_medio'], 
                'ultima_compra' => $linha['ultima_compra'], 
                'primeira_compra' => $linha['primeira_compra']
            ];
        }
        return $dados;
    }

    public function getPatrimonioAgrupadoPorAno()
    {
        $dados = [];
        $query = "
            select extract(year from data) as ano, 
                   sum(preco_total) as preco_total
            from compras_e_vendas 
            group by 1 
            order by 1 desc;
        ";
        foreach ($this->connection->query($query) as $linha) {
            $dados[] = [
                'ano' => $linha['ano'], 
                'preco_total' => $linha['preco_total']
            ];
        }
        return $dados;
    }

    public function getPatrimonioAgrupadoPorMes()
    {
        $dados = [];
        $query = "
            select extract(year from data) ::int as ano, 
                   extract(month from data) ::int as mes, 
                   sum(preco_total) as total 
            from compras_e_vendas 
            group by 1, 2 
            order by 1 desc, 2 desc
        ";
        foreach ($this->connection->query($query) as $linha) {
            $dados[] = [
                'ano' => $linha['ano'], 
                'mes' => $linha['mes'],
                'total' => $linha['total']
            ];
        }
        return $dados;
    }

    public function getPatrimonioAgrupadoPorAnoPorAtivo()
    {
        $dados = [];
        $query = "
            select extract(year from data) as ano, 
                   ativo, 
                   sum(quantidade) as quantidade, 
                   sum(preco_total) as total, 
                   (sum(preco_total) / sum(quantidade)) ::decimal(12,2) as preco_medio
            from compras_e_vendas 
            group by 1, 2 
            order by 1 desc, 4 desc;
        ";
        foreach ($this->connection->query($query) as $linha) {
            $dados[] = [
                'ano' => $linha['ano'], 
                'ativo' => $linha['ativo'],
                'quantidade' => $linha['quantidade'],
                'total' => $linha['total'],
                'preco_medio' => $linha['preco_medio']
            ];
        }
        return $dados;
    }
}