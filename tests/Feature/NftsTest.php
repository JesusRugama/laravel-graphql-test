<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\Nft;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NftsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test basic usage for the NFT query.
     *
     * @test
     * @return void
     */
    public function it_fetches_all_nfts(): void
    {
        $user = User::factory()->create();
        Nft::factory()->count(5)->create([
            'user_id' => $user,
        ]);

        $response = $this->graphQL(/** @lang GraphQL */ '
            {
                nfts {
                    data {
                        id
                    }
                }
            }
        ');

        $response->assertOk();
        $response->assertJsonCount(5, 'data.nfts.data');
    }
}
