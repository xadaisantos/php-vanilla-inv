<?php

class Dividendos {

    private $connection;
    public $table = 'dividendos';

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
                quantidade INTEGER NOT NULL,
                valor DECIMAL(12,2) NOT NULL,
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
        $statement = $this->connection->prepare("INSERT INTO $this->table (ativo, quantidade, valor, data) VALUES (:ativo, :qtd, :valor, :data);");
        $statement->bindParam(":ativo", $obj['ativo']);
        $statement->bindParam(":qtd", $obj['quantidade']);
        $statement->bindParam(":valor", $obj['valor']);
        $statement->bindParam(":data", $obj['data']);
        return $statement->execute();
    }

    public function delete($id)
    {
        $statement = $this->connection->prepare("DELETE FROM $this->table WHERE id = ?");
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function getDividendosAgrupadosPorMes()
    {
        $dados = [];
        $query = "select extract(year from data) ::int as ano, extract(month from data) ::int as mes, sum(valor) as total from dividendos group by 1, 2 order by 1 desc, 2 desc;";

        foreach ($this->connection->query($query) as $linha) {
            $dados[] = ['ano' => $linha['ano'], 'mes' => $linha['mes'], 'total' => $linha['total']];
        }
        return $dados;
    }

    public function getDividendosAgrupadosPorAtivos()
    {
        $dados = [];
        $query = "select ativo, sum(valor) as total, min(data) as primeiro_dividendo, max(data) as ultimo_dividendo from dividendos group by 1 order by 2 desc;";

        foreach ($this->connection->query($query) as $linha) {
            $dados[] = [
                'ativo' => $linha['ativo'], 
                'total' => $linha['total'],
                'primeiro_dividendo' => $linha['primeiro_dividendo'],
                'ultimo_dividendo' => $linha['ultimo_dividendo']
            ];
        }
        return $dados;
    }

    public function getDividendosAgrupadosPorAnoPorAtivo()
    {
        $dados = [];
        $query = "select extract(year from data) as ano, ativo, sum(valor) as total from dividendos group by 1, 2;";

        foreach ($this->connection->query($query) as $linha) {
            $dados[] = [
                'ano' => $linha['ano'], 
                'ativo' => $linha['ativo'], 
                'total' => $linha['total']
            ];
        }
        return $dados;
    }

    public function getDividendosAgrupadosPorAno()
    {
        $dados = [];
        $query = "select extract(year from data) as ano, sum(valor) as total from dividendos group by 1 order by 1 desc;";

        foreach ($this->connection->query($query) as $linha) {
            $dados[] = [
                'ano' => $linha['ano'], 
                'total' => $linha['total']
            ];
        }
        return $dados;
    }
}