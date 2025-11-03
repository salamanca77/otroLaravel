<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $registro_id
 * @property string $estado
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Registro $registro
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente whereEstado($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente whereRegistroId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|ImpresionePendiente whereUpdatedAt($value)
 */
	class ImpresionePendiente extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $nombre
 * @property string $placa
 * @property \Illuminate\Support\Carbon $fecha_entrada
 * @property \Illuminate\Support\Carbon $hora_entrada
 * @property \Illuminate\Support\Carbon|null $fecha_salida
 * @property \Illuminate\Support\Carbon|null $hora_salida
 * @property int|null $tiempo_de_estancia
 * @property string|null $monto_a_pagar
 * @property string|null $impreso_en
 * @property string|null $tipo_tarifa
 * @property string|null $tarifa
 * @property string|null $obsevacion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $tarifa_a_pagar
 * @property-read mixed $tiempo_de_estancia_en_horas
 * @property-read mixed $tiempo_de_estancia_en_minutos
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereFechaEntrada($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereFechaSalida($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereHoraEntrada($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereHoraSalida($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereImpresoEn($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereMontoAPagar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereObsevacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro wherePlaca($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereTarifa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereTiempoDeEstancia($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereTipoTarifa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Registro whereUpdatedAt($value)
 */
	class Registro extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $tarifa
 * @property string $tipo_tarifa
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa whereTarifa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa whereTipoTarifa($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Tarifa whereUpdatedAt($value)
 */
	class Tarifa extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $placa_vehiculo
 * @property \Illuminate\Support\Carbon $fecha_entrada
 * @property \Illuminate\Support\Carbon $hora_entrada
 * @property \Illuminate\Support\Carbon|null $fecha_salida
 * @property \Illuminate\Support\Carbon|null $hora_salida
 * @property string $tarifa_por_minuto
 * @property string|null $observaciones
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read mixed $id_registro
 * @property-read mixed $tarifa_a_pagar
 * @property-read mixed $tiempo_de_estancia_en_horas
 * @property-read mixed $tiempo_de_estancia_en_minutos
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereFechaEntrada($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereFechaSalida($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereHoraEntrada($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereHoraSalida($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereObservaciones($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket wherePlacaVehiculo($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereTarifaPorMinuto($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|Ticket whereUpdatedAt($value)
 */
	class Ticket extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $two_factor_secret
 * @property string|null $two_factor_recovery_codes
 * @property string|null $two_factor_confirmed_at
 * @property string|null $remember_token
 * @property int|null $current_team_id
 * @property string|null $profile_photo_path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read string $profile_photo_url
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User permission($permissions, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User role($roles, $guard = null, $without = false)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCurrentTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereProfilePhotoPath($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorConfirmedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorRecoveryCodes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereTwoFactorSecret($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutPermission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User withoutRole($roles, $guard = null)
 */
	class User extends \Eloquent {}
}

