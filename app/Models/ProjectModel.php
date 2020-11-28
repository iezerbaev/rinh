<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectModel
 *
 * @property int $id
 * @property string $name
 * @property string|null $department
 * @property string|null $stage
 * @property string $description
 * @property string|null $pdf_file
 * @property string|null $doc_file
 * @property string|null $commercialization
 * @property string|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereCommercialization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereDepartment($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereDocFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel wherePdfFile($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereStage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectModel whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProjectModel extends Model
{
    use HasFactory;
}
