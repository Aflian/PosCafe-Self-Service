<?php 
namespace App\Filament\Kasir\Resources\Payments\Tables;

use Filament\Tables\Table;
use Filament\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;

class PaymentsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('order.kode_order')
                    ->label('Kode Order')
                    ->searchable(),

                TextColumn::make('paymentMethod.nama_metode')
                    ->label('Metode'),

                TextColumn::make('nominal')
                    ->label('Nominal')
                    ->money('IDR'),

                TextColumn::make('status')
                    ->badge()
                    ->colors([
                        'warning' => 'pending',
                        'success' => 'valid',
                        'danger'  => 'invalid',
                    ]),

                TextColumn::make('created_at')
                    ->label('Waktu')
                    ->dateTime('d M Y H:i'),
            ])
            ->defaultSort('created_at', 'desc')
            ->actions([
                Action::make('lihat_bukti')
                    ->label('Bukti')
                    ->icon('heroicon-o-photo')
                    ->modalHeading('Bukti Pembayaran')
                    ->modalSubmitAction(false)
                    ->modalCancelActionLabel('Tutup')
                    ->form(fn ($record) => [
                        FileUpload::make('bukti')
                            ->image()
                            ->disabled()
                            ->default($record->bukti),
                    ]),
                Action::make('cetak')
                    ->label('Struk')
                    ->icon('heroicon-o-printer')
                    ->url(fn ($record) => route('struk', $record))
                    ->openUrlInNewTab()
                    ->visible(fn ($record) => $record->status !== 'menunggu_verifikasi'),
            ]);
    }
}
