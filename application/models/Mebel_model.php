<?php 

use GuzzleHttp\Client;

class Mebel_model extends CI_model {

    private $_client;

    public function __construct()
    {
        $this->_client = new Client([
            'base_uri' => 'http://localhost/rest-api/kal-rest-server/api/mebel',
            
        ]);
    }

    public function getAllMebel()
    {
        $response = $this->_client->request('GET', 'mebel', [
            'query' => [
                'apikey' => '96930c1e'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'];
    }

    public function getMebelById($id)
    {

        $response = $this->_client->request('GET','mebel', [
            'query' => [
                'apikey' => '96930c1e',
                'id' => $id
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);

        return $result['data'][0];
    }

    public function tambahDataMebel()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "bahan" => $this->input->post('bahan', true),
            "merk" => $this->input->post('merk', true),
            "harga" => $this->input->post('harga', true),
            'apikey' => '96930c1e'
        ];

        $response = $this->_client->request('POST', 'mebel',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function hapusDataMebel($id)
    {
        $response = $this->_client->request('DELETE', 'mebel',[
            'form_params' => [
                'id' => $id,
                'apikey' => '96930c1e'
            ]
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    

    public function ubahDataMebel()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "bahan" => $this->input->post('bahan', true),
            "merk" => $this->input->post('merk', true),
            "harga" => $this->input->post('harga', true),
            "id" => $this->input->post('id', true),
            'apikey' => '96930c1e'

        ];

        $response = $this->_client->request('PUT', 'mebel',[
            'form_params' => $data
        ]);
        $result = json_decode($response->getBody()->getContents(), true);
        return $result;
    }

    public function cariDataMebel()
    {
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->or_like('bahan', $keyword);
        $this->db->or_like('merk', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get('mebel')->result_array();
    }
}