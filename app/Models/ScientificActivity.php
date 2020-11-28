<?php


namespace App\Models;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\ScientificActivity
 *
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $slug
 * @property string|null $links
 * @property string|null $place
 * @property string|null $date
 * @property string|null $price
 * @property int $type
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read MediaCollection|Media[] $media
 * @property-read int|null $media_count
 * @method static Builder|ScientificActivity newModelQuery()
 * @method static Builder|ScientificActivity newQuery()
 * @method static Builder|ScientificActivity query()
 * @method static Builder|ScientificActivity whereCreatedAt($value)
 * @method static Builder|ScientificActivity whereDate($value)
 * @method static Builder|ScientificActivity whereId($value)
 * @method static Builder|ScientificActivity whereLinks($value)
 * @method static Builder|ScientificActivity whereName($value)
 * @method static Builder|ScientificActivity wherePlace($value)
 * @method static Builder|ScientificActivity wherePrice($value)
 * @method static Builder|ScientificActivity whereSlug($value)
 * @method static Builder|ScientificActivity whereType($value)
 * @method static Builder|ScientificActivity whereUpdatedAt($value)
 * @method static Builder|ScientificActivity whereUserId($value)
 * @mixin \Eloquent
 */
class ScientificActivity extends Model implements HasMedia
{
    use InteractsWithMedia, HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'links',
        'place',
        'date',
        'price',
        'type',
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function getTypeAttribute(int $value): string
    {
        switch ($value) {
            case 0:
                return 'НИР';
            case 1:
                return 'Грант';
            default :
                return 'Другое';
        }
    }
}
