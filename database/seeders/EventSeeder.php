<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        // Lista de tipos de evento realistas
        $eventTypes = ['Social', 'Cultural', 'Esportivo', 'Corporativo', 'Religioso', 'Entretenimento', 'Outros'];

        // Lista de nomes de eventos com mais variação e sem repetições
        $eventNames = [
            'Festa Junina', 'Feira Gastronômica', 'Show de Música ao Vivo', 'Workshop de Marketing Digital',
            'Culto de Celebração', 'Festa de Aniversário Corporativa', 'Festival de Cinema Independente',
            'Copa de Futebol', 'Exposição de Arte Contemporânea', 'Congresso de Tecnologia',
            'Festival de Artes Visuais', 'Campeonato de Basquetebol', 'Campeonato de Jiu-Jitsu', 'Campeonato de Luta',
            'Encontro de Fotógrafos', 'Festival Gastronômico', 'Palestra de Desenvolvimento Pessoal',
            'Maratona de Programação', 'Evento de Networking', 'Feira de Empreendedorismo', 'Retiro Espiritual',
            'Festival de Música Independente', 'Exposição de Escultura', 'Semana de Arte e Cultura',
            'Torneio de Futebol de Salão', 'Workshop de Cervejas Artesanais', 'Desafio de Skate',
            'Seminário sobre Inteligência Artificial', 'Feira de Produtos Orgânicos', 'Caminhada Ecológica',
            'Encontro de Negócios', 'Curso de Fotografia', 'Festival de Cinema Nacional', 'Competição de Dança',
            'Simulado de Primeiros Socorros', 'Festival de Comédia', 'Encontro de Jovens Líderes', 'Curso de Idiomas',
            'Oficina de Pintura', 'Retiro de Bem-Estar', 'Palestra sobre Sustentabilidade', 'Mostra de Teatro',
            'Festival de Inovação', 'Encontro de Bloggers', 'Competição de Videoclipes', 'Exposição de Fotografia',
            'Ciclo de Palestras sobre Empreendedorismo', 'Feira de Artesanato', 'Evento de Tecnologia Emergente'
        ];

        // Embaralha os nomes para garantir que sejam aleatórios e únicos
        shuffle($eventNames);

        // Gerar 50 eventos fictícios com nomes e descrições mais realistas
        foreach (range(1, 50) as $index) {
            $eventType = $faker->randomElement($eventTypes);
            $eventName = array_shift($eventNames); // Retira o primeiro nome da lista embaralhada
            $eventDate = Carbon::now()->addDays(rand(1, 60)); // Definindo uma data futura aleatória
            $eventPrice = $faker->randomFloat(2, 20, 1000); // Preço aleatório entre 20 e 1000

            Event::create([
                'type' => $eventType,
                'name' => $eventName,
                'description' => $this->generateRealisticDescription($faker), // Gerar uma descrição mais variada
                'address' => $faker->address,
                'start_time' => $eventDate->format('Y-m-d H:i:s'),
                'price' => $eventPrice,
            ]);
        }
    }

    /**
     * Gera uma descrição mais realista para o evento
     *
     * @param \Faker\Generator $faker
     * @return string
     */
    private function generateRealisticDescription($faker)
    {
        // Definindo algumas palavras-chave para descrever eventos
        $descriptions = [
            "Junte-se a nós para um evento emocionante que trará as melhores {type} do país.",
            "Este evento promete ser uma experiência única com {type} de altíssima qualidade.",
            "Participe e aproveite o que preparamos especialmente para você! Não perca a oportunidade de vivenciar {type}.",
            "Um evento repleto de atividades que incluem {type}, palestras e muita interação com profissionais da área.",
            "Venha fazer parte de um evento que conecta {type} com grandes especialistas e oportunidades de aprendizado.",
            "Vamos celebrar o melhor de {type} em um evento cheio de atividades interativas e grandes nomes da indústria."
        ];

        $type = $faker->randomElement(['cultura', 'esporte', 'tecnologia', 'arte', 'religião', 'entretenimento']);
        $description = $faker->randomElement($descriptions);

        // Substitui a palavra-chave {type} com o tipo do evento
        return str_replace("{type}", $type, $description);
    }
}
